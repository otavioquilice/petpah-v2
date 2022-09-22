<?php
namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoProduto extends Model
{
	use SoftDeletes;
    use Uuid;
	protected $table = "cesta_clinte";
	protected $fillable = [
		"uuid",
		"nome",
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
		return $this->hasOne(Produtos::class, "produto_id", "id");
	}

    public function cliente()
	{
		return $this->hasOne(User::class, "cliente_id", "id");
	}
}
