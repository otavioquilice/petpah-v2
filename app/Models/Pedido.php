<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Pedido extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Uuid;
	protected $table = "pedidos";
	protected $fillable = [
		"uuid",
		"id",
		"cliente_id",
		'ong_id',
		"valor",
		"status",
		"created_at",
        "updated_at",
        "deleted_at",
    ];

    public function itens_pedido()
	{
		return $this->hasMany(ItemPedido::class, "pedido_id", "id");
	}

    public function cliente()
	{
		return $this->belongsTo(User::class, "cliente_id", "id");
	}
}
