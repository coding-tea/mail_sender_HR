<?php
namespace App\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Component;

class DatatableDto extends Component
{
    public $links;
    public $title;
    public $description;
    public $heads;
    public $actions;
    public $queryBuilder;

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
        $this->links = $this->queryBuilder->getModel()->getTable();
    }

    public function getTitle(){
        dd($this->queryBuilder);
        // return $this->title;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getHeads(){
        return $this->heads;
    }

    public function getActions(){
        return $this->actions;
    }

    public function getAll(int $paginate)
    {
        return $this->queryBuilder->paginate($paginate);
    }

    public function search(string $keyword)
    {
        return $this->queryBuilder->where('name', 'like', '%' . $keyword . '%')->get();
    }

    public function delete(int $id): void
    {
        $this->queryBuilder->getModel()->findOrFail($id)->delete();
    }

    public function deleteSelected(array $ids): void
    {
        $this->queryBuilder->whereIn('id', $ids)->delete();
    }

    public function render()
    {
        return view('livewire.datatable-dto');
    }
}
