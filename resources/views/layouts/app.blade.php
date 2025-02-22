<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>

    <script>
        document.querySelectorAll(".tip-box").forEach((box) => {
            box.addEventListener("blur", function () {
                let tipId = this.innerText.trim(); // Get the new text
                let originalText = this.dataset.originalText || this.innerText; // Keep track of original text
                let tipNumber = originalText.match(/\d+/)[0]; // Extract number from "Tip 01"
        
                fetch("/update-tip", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    },
                    body: JSON.stringify({ tip_number: tipNumber, tip_text: tipId }),
                })
                .then(response => response.json())
                .then(data => console.log("Updated successfully", data))
                .catch(error => console.error("Error updating tip:", error));
            });
        });

        function editProduct(element) {
    let productId = element.getAttribute('data-id');
    let currentText = element.innerText;

    let input = document.createElement('input');
    input.type = 'text';
    input.value = currentText;
    input.onblur = function () {
        saveProduct(productId, input.value);
    };
    element.innerHTML = '';
    element.appendChild(input);
    input.focus();
}

function saveProduct(id, newValue) {
    fetch('/update-product/' + id, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ name: newValue })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    });
}

        </script>

        
        
        
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
