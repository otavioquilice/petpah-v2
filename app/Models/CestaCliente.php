<?php
namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CestaCliente extends Model
{
	use SoftDeletes;
    use Uuid;
	protected $table = "cesta_clientes";
	protected $fillable = [
		"uuid",
		'id',
		"cliente_id",
		"produto_id",
		"ativo",
		"quantidade",
		"created_at",
        "updated_at",
        "deleted_at",

	];


    public function produto()
	{
		return $this->hasMany(Produtos::class, "produto_id", "id");
	}

    public function cliente()
	{
		return $this->hasMany(User::class, "cliente_id", "id");
	}
}
