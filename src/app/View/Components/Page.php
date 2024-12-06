<?php

namespace AndersonLucas\HomeStock\View\Components;

class Page {
    private $header_html;
    private $body_html;
    private $footer_html;

    function header(string $title): void {
        $this->header_html = `
            <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>$title</title>
                </head>
        `;
    }

    function body(array $props = null): void {
        $this->body_html .= join($props);
    }

    function footer() {
        $this->footer_html = ' 
            <script src=" ' .  BASE_URL . '/app/Libs/js/tailwind_3.4.15.js"></script>
        </html>
        ';
    }

    function print() {
        echo $this->header_html;
        echo $this->body_html;
        echo $this->footer_html;
    }
}
