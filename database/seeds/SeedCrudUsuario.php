<?php


use Phinx\Seed\AbstractSeed;

class SeedCrudUsuario extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
		$data = [
			'nome' => 'Usuário Teste',
			'email' => 'usuario@email.com',
			'senha' => password_hash('123456', PASSWORD_BCRYPT)
		];

        $usuarios = $this->table('usuarios');
        $usuarios->insert($data)->save();
    }
}
