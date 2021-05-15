<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::create(['name' => 'administrador']);
        $role_invent = Role::create(['name' => 'inventario']);
        $role_blog = Role::create(['name' => 'blogger']);

        // Rutas de Dashboard Cms
        Permission::create(['name' => 'cms.index'])->syncRoles([ $role_admin, $role_invent, $role_blog]);
        // Rutas de Usuarios
        Permission::create(['name' => 'cms.users.show'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'cms.users.create'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'cms.users.store'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'cms.users.edit'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'cms.users.update'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'cms.users.destroy'])->syncRoles([ $role_admin]);

        // Rutas de categorias de prodcutos
        Permission::create(['name' => 'cms.products.categories.show'])->syncRoles([ $role_admin, $role_invent]);
        Permission::create(['name' => 'cms.products.categories.edit'])->syncRoles([ $role_admin ]);
        Permission::create(['name' => 'cms.products.categories.update'])->syncRoles([ $role_admin ]);
        // Rutas de Productos
        Permission::create(['name' => 'cms.products.show'])->syncRoles([ $role_admin, $role_invent ]);
        Permission::create(['name' => 'cms.products.create'])->syncRoles([ $role_admin, $role_invent ]);
        Permission::create(['name' => 'cms.products.store'])->syncRoles([ $role_admin, $role_invent ]);
        Permission::create(['name' => 'cms.products.edit'])->syncRoles([ $role_admin, $role_invent ]);
        Permission::create(['name' => 'cms.products.update'])->syncRoles([ $role_admin, $role_invent ]);
        Permission::create(['name' => 'cms.products.destroy'])->syncRoles([ $role_admin, $role_invent ]);

        // Rutas de Parametros
        Permission::create(['name' => 'cms.products.parameters.show'])->syncRoles([ $role_admin, $role_invent ]);
        Permission::create(['name' => 'cms.products.parameters.create'])->syncRoles([ $role_admin, $role_invent ]);
        Permission::create(['name' => 'cms.products.parameters.store'])->syncRoles([ $role_admin, $role_invent ]);
        Permission::create(['name' => 'cms.products.parameters.edit'])->syncRoles([ $role_admin, $role_invent ]);
        Permission::create(['name' => 'cms.products.parameters.update'])->syncRoles([ $role_admin, $role_invent ]);
        Permission::create(['name' => 'cms.products.parameters.destroy'])->syncRoles([ $role_admin, $role_invent ]);

        // Rutas de categorias de Blog
        Permission::create(['name' => 'cms.blog.categories.show'])->syncRoles([ $role_admin, $role_blog]);
        Permission::create(['name' => 'cms.blog.categories.create'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'cms.blog.categories.store'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'cms.blog.categories.edit'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'cms.blog.categories.update'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'cms.blog.categories.destroy'])->syncRoles([ $role_admin]);
        // Rutas de Blog
        Permission::create(['name' => 'cms.blog.show'])->syncRoles([ $role_admin, $role_blog]);
        Permission::create(['name' => 'cms.blog.create'])->syncRoles([ $role_admin, $role_blog]);
        Permission::create(['name' => 'cms.blog.store'])->syncRoles([ $role_admin, $role_blog]);
        Permission::create(['name' => 'cms.blog.edit'])->syncRoles([ $role_admin, $role_blog]);
        Permission::create(['name' => 'cms.blog.update'])->syncRoles([ $role_admin, $role_blog]);
        Permission::create(['name' => 'cms.blog.destroy'])->syncRoles([ $role_admin, $role_blog]);
    }
}
