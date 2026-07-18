<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body class="min-h-screen flex items-center justify-center">
    <form class="w-full max-w-lg p-8 bg-white border border-gray-200 rounded-xl shadow-lg">
        <div class="flex flex-col items-center mb-8">
            <svg class="w-12 h-12 text-gray-800 mb-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                    clip-rule="evenodd" />
            </svg>

            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                تسحيل الدخول
            </h1>
        </div>
        <div class="mb-5">
            <div class="mb-5">
                <label for="email-alternative" class="block mb-2 text-sm font-medium">
                    البريد الإلكتروني
                </label>

                <div class="relative">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 4-7.89 4.26a2 2 0 0 1-1.9 0L1 4m18-2H1v12h18V2Z" />
                        </svg>
                    </div>

                    <input type="email" id="email-alternative"
                        class="w-full rounded-lg border border-gray-300 py-2.5 pr-10 pl-3"
                        placeholder="البريد الإلكتروني">
                </div>
            </div>
        </div>

        <div class="mb-5">
            <div class="mb-5">
                <label for="password-alternative" class="block mb-2 text-sm font-medium">
                    كلمة المرور
                </label>

                <div class="relative">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M8 10V7a4 4 0 1 1 8 0v3h1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-8a1 1 0 0 1 1-1h1Zm2 0h4V7a2 2 0 1 0-4 0v3Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>

                    <input type="password" id="password-alternative"
                        class="w-full rounded-lg border border-gray-300 py-2.5 pr-10 pl-3" placeholder="كلمة المرور">
                </div>
            </div>
        </div>

        <div class="flex items-start mb-5">
            <label for="remember-alternative" class="flex items-center h-5">
                <input id="remember-alternative" type="checkbox"
                    class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft"
                    required />
                <p class="ms-2 text-sm font-medium text-heading">
                    أنا أتفق مع <a href="#" class="text-fg-brand hover:underline">الشروط والأحكام</a>.
                </p>
            </label>
        </div>
        <a href="/dashboard" class="block w-full bg-blue-600 text-white py-3 rounded-lg text-center hover:bg-blue-700">
            تسحيل الدخول
        </a>
    </form>

    </div>



</body>

</html>
