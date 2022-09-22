<?php
namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
	use SoftDeletes;
    use Uuid;
	protected $table = "produto";
	protected $fillable = [
		"uuid",
		"tipo_produto_id",
		"nome",
		"descricao",
		"codigo",
		"quantidade",
		"preco_id",
		"created_at",
        "updated_at",
        "deleted_at",

	];


	public function preco()
	{
		return $this->belongToMany(Produtos::class, "id", "produto_id");
	}

	public function tipo_produto()
	{
		return $this->hasone(TipoProduto::class, "tipo_produto_id", "id");
	}
}
