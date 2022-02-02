<?php

namespace App\View\Components\Products;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $query = $this->user->products()
            ->join('inventory', 'inventory.product_id', '=', 'products.id')
            ->select('products.*')
            ->addSelect(DB::raw('SUM(inventory.price * inventory.quantity) as potential_revenue'))
            ->addSelect(DB::raw('GROUP_CONCAT(inventory.sku) as inventory_group_concat_sku'))
            ->groupBy('products.id');
        
        $id = (int)$this->filters['id'] ?? null;
        if ($id > 0) {
            $query->where('id', $id);
        }

        return $query;
    }

    public function render()
    {
        $paginator = $this->getQuery()->paginate(10);

        return view('components.products.grid', [
            'products' => $paginator,
        ]);
    }
}