<?php
namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
	use SoftDeletes;
	use Uuid;
	protected $table = "produtos";
	protected $fillable = [
		"uuid",
		"id",
		"tipo_produtos_id",
		"nome",
		"descricao",
		"codigo",
		"quantidade",
		"created_at",
        "updated_at",
        "deleted_at",

	];

	public function preco()
	{
		return $this->hasMany(PrecoProduto::class, "produto_id", "id");
	}

	public function tipo_produto()
	{
		return $this->hasOne(TipoProduto::class, "tipo_produtos_id", "id");
	}

	public function cesta_cliente()
	{
		return $this->hasMany(CestaCliente::class, "produto_id", "id");
	}
}
