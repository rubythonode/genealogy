<?php

namespace App\Forms\Builders;

use App\Family;
use App\Individual;
use App\Enums\IndividualTypes;
use LaravelEnso\FormBuilder\app\Classes\Form;

class FamilyForm
{
    private const TemplatePath = __DIR__.'/../Templates/family.json';

    private $form;

    public function __construct()
    {
        $this->form = new Form(self::TemplatePath);
    }

    public function create()
    {
        return $this->form
            ->options('type_id', IndividualTypes::select())
//            ->options('individualList', Individual::all()->pluck('name', 'id'))
            ->options('individualList', Individual::get(['first_name', 'individuals.id']))
            ->options('mother_id', Individual::get(['first_name', 'individuals.id']))
            ->options('father_id', Individual::get(['first_name', 'individuals.id']))
            ->create();
    }

    public function edit(Family $family)
    {
        $family->append(['individualList']);

        return $this->form
            ->options('type_id', IndividualTypes::select())
            ->options('individualList', Individual::get(['first_name', 'individuals.id']))
            ->options('mother_id', Individual::get(['first_name', 'individuals.id']))
            ->options('father_id', Individual::get(['first_name', 'individuals.id']))
            ->edit($family);
    }
}
