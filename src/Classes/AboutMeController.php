<?php

namespace Classes;

use Classes\Viewer;

/**
 * Class AboutMeController
 * Контролер для сторінки "About me". Підготовлює дані та передає їх у шаблон.
 *
 * @package Classes
 */
class AboutMeController
{
    /**
     * Відображає сторінку "Про мене".
     *
     * Підготує масив даних для шаблона та викликає Viewer::show().
     *
     * @return void
     */
    public function show(): void
    {
        $data = [
            'title' => 'Про мене',
            'name' => "Ксенія Симоненко",
            'bio' => 'Коротко: Студентка, 2 курсу, спеціальність "Комп\'ютерні науки". Захоплююсь веб-розробкою та дизайном.',
            'skills' => [
                'HTML',
                'CSS',
                'JavaScript',
                'C++',
                'Python',
            ],
        ];

        Viewer::show('aboutme', $data);
    }
}
