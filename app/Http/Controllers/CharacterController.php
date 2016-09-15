<?php

namespace App\Http\Controllers;

use App\Character;
use App\Http\Requests;
use DataEdit;
use DataFilter;
use \Serverfireteam\Panel\CrudController;

class CharacterController extends CrudController
{

    public function all($entity)
    {
        parent::all($entity);

        $this->filter = DataFilter::source(new Character());
        $this->filter->add('hanzi', 'Hanzi', 'text');
        $this->filter->add('pinyin', 'PinYin', 'text');
        $this->filter->add('translation', 'English', 'text');
        $this->filter->add('section_id', 'Section ID', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('hanzi', 'Hanzi');
        $this->grid->add('pinyin', 'PinYin');
        $this->grid->add('translation', 'Translation');
        $this->grid->add('section_id', 'Section ID');
        $this->addStylesToGrid();

        return $this->returnView();
    }

    public function edit($entity)
    {
        parent::edit($entity);

        $this->edit = DataEdit::source(new Character());
        $this->edit->label('Edit Character');
        $this->edit->add('hanzi', 'Hanzi', 'text')->rule('required');
        $this->edit->add('pinyin', 'PinYin', 'text')->rule('required');
        $this->edit->add('translation', 'Translation', 'text')->rule('required');
        $this->edit->add('section_id', 'Section ID', 'text')->rule('required');
        return $this->returnEditView();
    }
}
