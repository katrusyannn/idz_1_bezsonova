<?php
function renderPage(string $title, string $content): void {
    ?>
    <!DOCTYPE html>
    <html lang="uk">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title><?= htmlspecialchars($title) ?></title>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: #f0f4f8;
                margin: 0; padding: 0;
                color: #333;
            }
            header {
                background-color: #007BFF;
                color: white;
                padding: 1rem 2rem;
                text-align: center;
                font-size: 1.6rem;
                font-weight: 700;
                letter-spacing: 1px;
            }
            main {
                max-width: 700px;
                margin: 2rem auto;
                background: white;
                padding: 2rem;
                border-radius: 8px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            }
            form {
                margin-bottom: 2rem;
            }
            label {
                font-weight: 600;
                display: block;
                margin-bottom: 0.5rem;
            }
            select, button {
                padding: 0.5rem;
                font-size: 1rem;
                margin-right: 1rem;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
            button {
                background-color: #007BFF;
                color: white;
                border: none;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
            button:hover {
                background-color: #0056b3;
            }
            h2 {
                border-bottom: 2px solid #007BFF;
                padding-bottom: 0.3rem;
                margin-top: 2rem;
                color: #0056b3;
            }
            p {
                background: #e7f1ff;
                padding: 0.5rem 1rem;
                border-radius: 4px;
                margin: 0.3rem 0;
            }
        </style>
    </head>
    <body>
        <header>Веб-застосунок для роботи з базою даних медсестер</header>
        <main>
            <?= $content ?>
        </main>
    </body>
    </html>
    <?php
}


