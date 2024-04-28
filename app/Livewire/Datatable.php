<?php

namespace App\Livewire;

use Livewire\Component;

class Datatable extends Component
{
    public $title;
    public $description;
    public $heads;
    public $actions;
    public $queryBuilder;
    public $data;

    public function mount(
        $queryBuilder,
        $title,
        $description,
        $heads,
        $actions,
    ) {
        $this->queryBuilder = $queryBuilder;
        $this->title = $title;
        $this->description = $description;
        $this->heads = $heads;
        $this->actions = $actions;
        $this->data = $this->queryBuilder->paginate(10);
    }

    public function render()
    {
        return view('livewire.datatable');
    }

    public function search($keyWord)
    {
        $this->data = $this->queryBuilder->where('name', 'like', '%' . $keyWord . '%')->get();
    }

    public function delete($id)
    {
        $this->queryBuilder->findOrFail($id)->delete();;
    }

    public function deleteSelected($ids)
    {
        $this->queryBuilder->whereIn('id', $ids)->delete();
    }
}
