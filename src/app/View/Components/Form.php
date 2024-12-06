<?php

namespace AndersonLucas\HomeStock\View\Components;

class Form {
    private string $field_html = '';
    public string $grid_html = '';

    function grid(string $title, string $subtitle) {
        $this->grid_html = "
            <form>    
                <div class='space-y-12'>
                    <div class='border-b border-gray-900/10 pb-12'>
                        <h2 class='text-base/7 font-semibold text-gray-900'>$title</h2>
                        <p class='mt-1 text-sm/6 text-gray-600'>$subtitle</p>
                    </div>
                </div>
                <div class='space-y-12'>$this->field_html</div>
            </form>";
    }

    function addInputText(string $name, string $label, string $id, string $type = 'text', string $placeholder = '') {
        $this->field_html .= "
            <div class='sm:col-span-4'>
                <label for='$name' class='block text-sm/6 font-medium text-gray-900'>$label</label>
                    <input id='$id' name='$name' type='$type' placeholder='$placeholder' class='block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6'>
            </div>";
    }
}
