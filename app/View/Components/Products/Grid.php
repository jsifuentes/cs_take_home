<?php

namespace App\View\Components\Products;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class Grid extends Component
{
    public User $user;

    public function __construct(
        public Request $request
    )
    {
        $this->user = $request->user();
    }

    public function getQuery()
    {
        return $this->user->products()
            ->withAggregate('inventory', 'sku', 'group_concat');
    }

    public function render()
    {
        $paginator = $this->getQuery()->paginate(10);

        return view('components.products.grid', [
            'products' => $paginator,
        ]);
    }
}