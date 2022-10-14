<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\HairStylist;
use App\Models\Service;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->customer_id('Khách hàng')->display(function ($customer_id) {
            $model = Customer::find($customer_id);
            if ($model) {
                return $model->name;
            }
        })->filter();
        $grid->hair_stylist_id('Nhân viên')->display(function ($hair_stylist_id) {
            $model = HairStylist::find($hair_stylist_id);
            if ($model) {
                return $model->name;
            }
        })->filter();
        $grid->column('note', __('Note'));
        $grid->column('services', 'Dịch vụ')->display(function ($services) {
            $full_services = "";
            foreach($services as $service_id){
                $service = Service::find($service_id["service_id"]);
                $full_services .= " , ".$service->name;
               // }
            }
            return "<span class='label label-warning'>".substr($full_services, 3)."</span>";
        });
        $grid->column('sum_price', __('Sum price'));
        $grid->column('date_time', __('Date time'));
        $grid->column('status', __('Status'))->using(Constant::STATUS)->filter();

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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('customer_id', __('Customer id'));
        $show->field('hair_stylist_id', __('Hair stylist id'));
        $show->field('note', __('Note'));
        $show->field('sum_price', __('Sum price'));
        $show->field('date_time', __('Date time'));
        $show->field('status', __('Status'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Order());

        $form->select('customer_id', __('Khách hàng'))->options(Customer::all()->pluck('name', 'id'))->required();
        $form->select('hair_stylist_id', __('Nhân viên'))->options(HairStylist::all()->pluck('name', 'id'))->required();
        $form->text('note', __('Note'));
        $form->number('sum_price', __('Sum price'));
        $form->datetime('date_time', __('Date time'))->default(date('Y-m-d H:i:s'));
        $form->select('status', __('Status'))->options(Constant::STATUS)->default(0);

        return $form;
    }
}
