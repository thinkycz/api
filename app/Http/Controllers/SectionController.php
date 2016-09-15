<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Section;
use DataEdit;
use DataFilter;
use DataGrid;
use \Serverfireteam\Panel\CrudController;

class SectionController extends CrudController
{

    public function all($entity)
    {
        parent::all($entity);

        $this->filter = DataFilter::source(new Section);
        $this->filter->add('name', 'Name', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = DataGrid::source($this->filter);
        $this->grid->add('name', 'Name');
        $this->addStylesToGrid();
        return $this->returnView();
    }

    public function edit($entity)
    {
        parent::edit($entity);

        $this->edit = DataEdit::source(new Section());
        $this->edit->label('Edit Section');
        $this->edit->add('name', 'Name', 'text');
        return $this->returnEditView();
    }
}
