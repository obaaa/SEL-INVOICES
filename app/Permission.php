<?php

namespace App;

class Permission extends \Spatie\Permission\Models\Permission
{

    public static function defaultPermissions()
    {
        return [
            'view_users',
            'add_users',
            'edit_users',
            'delete_users',

            'view_roles',
            'add_roles',
            'edit_roles',
            'delete_roles',

            'view_posts',
            'add_posts',
            'edit_posts',
            'delete_posts',

            'view_suppliers',
            'add_suppliers',
            'edit_suppliers',
            'delete_suppliers',

            'view_item_categories',
            'add_item_categories',
            'edit_item_categories',
            'delete_item_categories',

            'view_item_attributes',
            'add_item_attributes',
            'edit_item_attributes',
            'delete_item_attributes',

            'view_items',
            'add_items',
            'edit_items',
            'delete_items',

            'view_customers',
            'add_customers',
            'edit_customers',
            'delete_customers',

            'view_item_packages',
            'add_item_packages',
            'edit_item_packages',
            'delete_item_packages',

            'view_expenses',
            'add_expenses',
            'edit_expenses',
            'delete_expenses',

            'view_expense_categories',
            'add_expense_categories',
            'edit_expense_categories',
            'delete_expense_categories',

            'view_incomes',
            'add_incomes',
            'edit_incomes',
            'delete_incomes',

            'view_income_categories',
            'add_income_categories',
            'edit_income_categories',
            'delete_income_categories',

            'view_bills',
            'add_bills',
            'edit_bills',
            'delete_bills',

            'view_invoices',
            'add_invoices',
            'edit_invoices',
            'delete_invoices',
        ];
    }
}
