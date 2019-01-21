<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('VillesTableSeeder');
        $this->command->info('Villes table seeded!');

        $path = '../sql/ville.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Villes table seeded!');

        $this->call('ResponsablesTableSeeder');
        $this->command->info('Responsables table seeded!');

        $path = '../sql/responsable.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Responsables table seeded!');

        $this->call('TypesTableSeeder');
        $this->command->info('Types table seeded!');

        $path = '../sql/type.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Types table seeded!');

        $this->call('CategoriesTableSeeder');
        $this->command->info('Categories table seeded!');

        $path = '../sql/categorie.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Categories table seeded!');

        $this->call('MagasinsTableSeeder');
        $this->command->info('Categories table seeded!');

        $path = '../sql/magasin.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Categories table seeded!');

        $this->call('AdhesionsTableSeeder');
        $this->command->info('Adhesions table seeded!');

        $this->call('AvisTableSeeder');
        $this->command->info('Avis table seeded!');

        $this->call('InternautesTableSeeder');
        $this->command->info('Internautes table seeded!');

        $this->call('PromotionsTableSeeder');
        $this->command->info('Promotions table seeded!');
    }
}
