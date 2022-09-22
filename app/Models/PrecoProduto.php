<?php
namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrecoProduto extends Model
{
	use SoftDeletes;
    use Uuid;
	protected $table = "tipo_produtos";
	protected $fillable = [
		"uuid",
		"produto_id",
		"preco",
		"ativo",
		"created_at",
        "updated_at",
        "deleted_at",

	];

    public function produto()
	{
		return $this->hasOne(Produto::class, "produto_id", "id");
	}
}
