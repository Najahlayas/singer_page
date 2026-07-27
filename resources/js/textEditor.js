import { Editor } from "https://esm.sh/@tiptap/core@2.6.6";
import StarterKit from "https://esm.sh/@tiptap/starter-kit@2.6.6";
import Highlight from "https://esm.sh/@tiptap/extension-highlight@2.6.6";
import Underline from "https://esm.sh/@tiptap/extension-underline@2.6.6";
import Link from "https://esm.sh/@tiptap/extension-link@2.6.6";
import TextAlign from "https://esm.sh/@tiptap/extension-text-align@2.6.6";
import Image from "https://esm.sh/@tiptap/extension-image@2.6.6";
import YouTube from "https://esm.sh/@tiptap/extension-youtube@2.6.6";
import TextStyle from "https://esm.sh/@tiptap/extension-text-style@2.6.6";
import FontFamily from "https://esm.sh/@tiptap/extension-font-family@2.6.6";
import { Color } from "https://esm.sh/@tiptap/extension-color@2.6.6";
import Bold from "https://esm.sh/@tiptap/extension-bold@2.6.6";

window.addEventListener("load", function () {
    const editorElement = document.getElementById("wysiwyg-example");
    const hiddenInput = document.getElementById("news-content"); // Reference to your database-linked input

    if (editorElement) {
        // --- ADD THIS BLOCK ---
        const style = document.createElement("style");
        style.innerHTML = `
    #wysiwyg-example { direction: rtl; text-align: right; }
    #wysiwyg-example ul { list-style-type: disc !important; padding-right: 40px !important; margin: 1em 0 !important; }
    #wysiwyg-example ol { list-style-type: decimal !important; padding-right: 40px !important; margin: 1em 0 !important; }
    #wysiwyg-example a { color: #1a56db !important; text-decoration: underline !important; cursor: pointer; }
    #wysiwyg-example [style*="text-align: left"] { text-align: left !important; }
    #wysiwyg-example [style*="text-align: center"] { text-align: center !important; }
    #wysiwyg-example [style*="text-align: right"] { text-align: right !important; }
    .is-active { background-color: #e5e7eb; border-radius: 4px; } /* Visual feedback for active styles */
`;
        document.head.appendChild(style);
        // --- END OF CSS BLOCK ---
        // 1. Setup Custom Extensions
        const FontSizeTextStyle = TextStyle.extend({
            addAttributes() {
                return {
                    fontSize: {
                        default: null,
                        parseHTML: (element) => element.style.fontSize,
                        renderHTML: (attributes) => {
                            if (!attributes.fontSize) return {};
                            return {
                                style: "font-size: " + attributes.fontSize,
                            };
                        },
                    },
                };
            },
        });

        const CustomBold = Bold.extend({
            renderHTML({ HTMLAttributes }) {
                const { style, ...rest } = HTMLAttributes;
                const newStyle =
                    "font-weight: bold;" + (style ? " " + style : "");
                return ["span", { ...rest, style: newStyle.trim() }, 0];
            },
        });

        // 2. Initialize Editor
     const editor = new Editor({
    element: editorElement,
    autofocus: true,

    extensions: [
        StarterKit.configure({
            textStyle: false,
            bold: false,
        }),
        CustomBold,
        TextStyle,
        Color,
        FontSizeTextStyle,
        FontFamily,
        Highlight,
        Underline,
        Link.configure({ openOnClick: false, autolink: true }),
        TextAlign.configure({
            types: ["heading", "paragraph"],
            defaultAlignment: "right",
        }),
        Image,
        YouTube,
    ],

    content: hiddenInput ? hiddenInput.value : "",

    onUpdate({ editor }) {
        if (hiddenInput) {
            hiddenInput.value = editor.getHTML();
        }
    },

    onSelectionUpdate({ editor }) {
        const syncActiveState = (id, name) => {
            const el = document.getElementById(id);

            if (el) {
                el.classList.toggle(
                    "is-active",
                    editor.isActive(name)
                );
            }
        };

        syncActiveState("toggleBoldButton", "bold");
        syncActiveState("toggleUnderlineButton", "underline");
        syncActiveState("toggleItalicButton", "italic");
    },

    editorProps: {
        attributes: {
            class: "format lg:format-lg dark:format-invert focus:outline-none max-w-none min-h-[250px]",
        },
          // --- IMPROVEMENT: UI FEEDBACK ---
            // Updates button styles when the cursor moves to edited text
            onSelectionUpdate({ editor }) {
                const syncActiveState = (id, name, opts = {}) => {
                    const el = document.getElementById(id);
                    if (el) {
                        if (editor.isActive(name, opts))
                            el.classList.add("is-active");
                        else el.classList.remove("is-active");
                    }
                };
                syncActiveState("toggleBoldButton", "bold");
                syncActiveState("toggleUnderlineButton", "underline");
                syncActiveState("toggleItalicButton", "italic");
            },
           }   // ----------------------------------
        });

        // 3. Helper function for Buttons (Stops form from submitting)
        const bindBtn = (id, fn) => {
            const el = document.getElementById(id);
            if (el) {
                el.addEventListener("click", (e) => {
                    e.preventDefault(); // CRITICAL: Stops page refresh
                    e.stopPropagation();
                    fn();
                });
            }
        };

        // 4. Bind Standard Buttons
        bindBtn("toggleBoldButton", () =>
            editor.chain().focus().toggleBold().run(),
        );
        bindBtn("toggleItalicButton", () =>
            editor.chain().focus().toggleItalic().run(),
        );
        bindBtn("toggleUnderlineButton", () =>
            editor.chain().focus().toggleUnderline().run(),
        );
        bindBtn("toggleStrikeButton", () =>
            editor.chain().focus().toggleStrike().run(),
        );

        bindBtn("toggleHighlightButton", () => {
            const isHighlighted = editor.isActive("highlight");
            editor
                .chain()
                .focus()
                .toggleHighlight({
                    color: isHighlighted ? undefined : "#ffc078",
                })
                .run();
        });

        bindBtn("toggleLinkButton", () => {
            const previousUrl = editor.getAttributes("link").href;
            const url = window.prompt("Enter URL:", previousUrl || "https://");

            if (url === null) return; // If user clicks 'Cancel'
            if (url === "") {
                editor.chain().focus().unsetLink().run();
                return;
            }
            editor.chain().focus().setLink({ href: url }).run();
        });

        bindBtn("removeLinkButton", () =>
            editor.chain().focus().unsetLink().run(),
        );
        bindBtn("toggleLeftAlignButton", () =>
            editor.chain().focus().setTextAlign("left").run(),
        );
        bindBtn("toggleCenterAlignButton", () =>
            editor.chain().focus().setTextAlign("center").run(),
        );
        bindBtn("toggleRightAlignButton", () =>
            editor.chain().focus().setTextAlign("right").run(),
        );
        bindBtn("toggleListButton", () =>
            editor.chain().focus().toggleBulletList().run(),
        );
        bindBtn("toggleOrderedListButton", () =>
            editor.chain().focus().toggleOrderedList().run(),
        );
        bindBtn("toggleBlockquoteButton", () =>
            editor.chain().focus().toggleBlockquote().run(),
        );
        bindBtn("toggleHRButton", () =>
            editor.chain().focus().setHorizontalRule().run(),
        );

        bindBtn("addImageButton", () => {
            const url = window.prompt("Image URL:");
            if (url) editor.chain().focus().setImage({ src: url }).run();
        });

        bindBtn("addVideoButton", () => {
            const url = window.prompt("YouTube URL:");
            if (url) editor.commands.setYoutubeVideo({ src: url });
        });

        // 5. Dropdown Logic (Flowbite)
        const getDrop = (id) =>
            typeof FlowbiteInstances !== "undefined"
                ? FlowbiteInstances.getInstance("Dropdown", id)
                : null;

        // Heading buttons
        document.querySelectorAll("[data-heading-level]").forEach((btn) => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                const level = parseInt(btn.getAttribute("data-heading-level"));
                editor.chain().focus().toggleHeading({ level }).run();
                getDrop("typographyDropdown")?.hide();
            });
        });

        bindBtn("toggleParagraphButton", () => {
            editor.chain().focus().setParagraph().run();
            getDrop("typographyDropdown")?.hide();
        });

        // Text Size
        document.querySelectorAll("[data-text-size]").forEach((btn) => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                const fontSize = btn.getAttribute("data-text-size");
                editor.chain().focus().setMark("textStyle", { fontSize }).run();
                getDrop("textSizeDropdown")?.hide();
            });
        });

        // Font Family
        document.querySelectorAll("[data-font-family]").forEach((btn) => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                const font = btn.getAttribute("data-font-family");
                editor.chain().focus().setFontFamily(font).run();
                getDrop("fontFamilyDropdown")?.hide();
            });
        });

        // Colors
        const colorPicker = document.getElementById("color");
        if (colorPicker) {
            colorPicker.addEventListener("input", (e) =>
                editor.chain().focus().setColor(e.target.value).run(),
            );
        }

        document.querySelectorAll("[data-hex-color]").forEach((btn) => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                editor
                    .chain()
                    .focus()
                    .setColor(btn.getAttribute("data-hex-color"))
                    .run();
            });
        });

        bindBtn("reset-color", () => editor.commands.unsetColor());



        // --- NEW: FUNCTION TO MANUALLY LOAD CONTENT (OPTIONAL) ---
        // Useful if you fetch data via AJAX instead of page load
        window.loadEditorContent = (content) => {
            editor.commands.setContent(content);
        };
    } // End of editor existence check
});
