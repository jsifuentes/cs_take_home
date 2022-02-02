<?php

namespace App\View\Components\Inventory;

use App\Models\Inventory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class Grid extends Component
{
    public User $user;

    public function __construct(
        public array $filters,
        public Request $request
    )
    {
        $this->filters = $filters;
        $this->user = $request->user();
    }

    public function getQuery()
    {
        $inventory = $this->user->inventory()
            ->with('product');

        if (strlen($this->filters['product']) > 0) {
            $inventory->where('product_id', $this->filters['product']);
        }

        if (strlen($this->filters['sku']) > 0) {
            $inventory->where('sku', 'like', '%' . $this->filters['sku'] . '%');
        }

        if ($this->filters['inventory_value'] !== null) {
            $inventory->where('quantity', $this->filters['inventory_operand'], $this->filters['inventory_value']);
        }

        return $inventory;
    }

    public function getUrl(Inventory $row): string
    {
        if (isset($this->filters['product'])) {
            return route('products', ['id' => $row->product_id]);
        }

        return route('inventory', ['product' => $row->product_id]);
    }

    public function render()
    {
        $paginator = $this->getQuery()->paginate(10);

        return view('components.inventory.grid', [
            'inventory' => $paginator,
        ]);
    }
}