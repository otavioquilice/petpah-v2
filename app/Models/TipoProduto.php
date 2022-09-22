<?php
namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoProduto extends Model
{
	use SoftDeletes;
    use Uuid;
	protected $table = "tipo_produtos";
	protected $fillable = [
		"uuid",
		"nome",
		"created_at",
        "updated_at",
        "deleted_at",

	];


    public function produtos()
	{
		return $this->hasMany(Produtos::class, "tipo_produto_id", "id");
	}
}
