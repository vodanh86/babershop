<?php

namespace App\Admin\Controllers;

use App\Models\OrderService;
use App\Models\Order;
use App\Models\Service;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderServiceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'OrderService';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OrderService());

        $grid->column('id', __('Id'));
        $grid->column('order_id', __('Order id'));
        $grid->service_id('Dịch vụ')->display(function ($service_id) {
            $model = Service::find($service_id);
            if ($model) {
                return $model->name;
            }
        })->filter();

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
        $show = new Show(OrderService::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('order_id', __('Order id'));
        $show->field('service_id', __('Service id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new OrderService());
        $form->select('order_id', __('Đơn hàng'))->options(Order::all()->pluck('id', 'id'))->required();
        $form->select('service_id', __('Dịch vụ'))->options(Service::all()->pluck('name', 'id'))->required();

        return $form;
    }
}
