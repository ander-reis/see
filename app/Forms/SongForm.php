<?php

namespace See\Forms;

use Kris\LaravelFormBuilder\Form;

class SongForm extends Form
{
    public function buildForm()
    {
        $form = $this
            ->add('name', 'text', ['rules' => 'required|min:5'])
            ->add('lyrics', 'textarea')
            ->add('publish', 'checkbox', [
                'label' => 'LABEL'
            ])
        ->add('submit', 'submit');

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
    }
}
