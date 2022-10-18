<?php

namespace App\Admin\Controllers;

use App\Models\Customer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CustomerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Customer';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Customer());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('user_name', __('User name'));
        $grid->column('birth_day', __('Birth day'));
        $grid->column('phone_number', __('Phone number'));
        $grid->column('address', __('Address'));
        $grid->column('image', __('Image'))->image();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Customer::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('user_name', __('User name'));
        $show->field('password', __('Password'));
        $show->field('birth_day', __('Birth day'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('phone_number', __('Phone number'));
        $show->field('address', __('Address'));
        $show->field('image', __('Image'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Customer());

        $form->text('name', __('Name'));
        $form->text('user_name', __('User name'));
        $form->date('birth_day', __('Birth day'))->default(date('Y-m-d'));
        $form->text('phone_number', __('Phone number'));
        $form->text('address', __('Address'));
        $form->image('image', __('Image'));

        return $form;
    }
}
