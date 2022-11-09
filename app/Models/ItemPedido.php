<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class ItemPedido extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Uuid;
	protected $table = "item_pedidos";
	protected $fillable = [
		"uuid",
		"id",
		"cliente_id",
		"pedido_id",
		'produto_id',
        "quantidade",
        "preco_unitario",
        "valor_total",
		"tipo_pedido",
		"created_at",
        "updated_at",
        "deleted_at",
    ];

    public function pedido()
	{
		return $this->belongsTo(Pedido::class, "pedido_id", "id");
	}

	public function produto()
	{
		return $this->belongsTo(Produto::class, "produto_id", "id");
	}

    public function cliente()
	{
		return $this->belongsTo(User::class, "cliente_id", "id");
	}
}
