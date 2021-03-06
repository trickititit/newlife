<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Repositories\UsersRepository;
use App\Repositories\RolesRepository;
use Illuminate\Http\Request;
use Photo;
use App\Http\Requests\UserRequest;
use App\Repositories\AdmMenusRepository;

class UserController extends AdminController
{

    protected $u_rep;
    protected $r_rep;

    public function __construct(RolesRepository $r_rep ,UsersRepository $u_rep, AdmMenusRepository $m_rep) {
        parent::__construct(new \App\Repositories\AdmMenusRepository(new \App\AdmMenu), new \App\Repositories\SettingsRepository(new \App\Setting()), new \App\User);
//        if(Gate::denies('VIEW_ADMIN')) {
//            abort(403);
//        }
        $this->inc_js_lib = array_add($this->inc_js_lib, 'filestyle', array('url' => '<script src="'.$this->pub_path.'/js/bootstrap-filestyle.min.js"></script>'));
        $this->template = config('settings.theme').'.admin.index';
        $this->u_rep = $u_rep;
        $this->r_rep = $r_rep;
        $this->m_rep = $m_rep;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkUser();
        $users = $this->u_rep->get();
        $this->content = view(config('settings.theme').'.admin.users')->with(array("users" => $users))->render();
        $this->title = 'Пользователи';
        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkUser();
        $roles = $this->r_rep->get();
        $input_roles = array();
        foreach ($roles as $role) {
            $input_roles = array_add($input_roles,$role->id, $role->name);
        }
        $this->inputs = array_add($this->inputs, "roles", $input_roles);
        $this->content = view(config('settings.theme').'.admin.userCreate')->with(array("inputs" => $this->inputs))->render();
        $this->title = 'Создание нового пользователя';
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->checkUser();
        // @FIXME: Доделать изображения!
//        $image = $request->file('image');
//        if ($image->isValid()) {
//            $storeFolder = public_path() . '/' . config('settings.theme') . '/uploads/images/';   //2
//            $img = Photo::make($image);
//            $img->fit(1500, 1000)->save($uploadDir ."/". $image_thumb_path);
//        }
        $result = $this->u_rep->addUser($request);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect(route("user.index"))->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->checkUser();
        $roles = $this->r_rep->get();
        $input_roles = array();
        foreach ($roles as $role) {
            $input_roles = array_add($input_roles,$role->id, $role->name);
        }
        $this->inputs = array_add($this->inputs, "roles", $input_roles);
        $this->content = view(config('settings.theme').'.admin.userCreate')->with(array("inputs" => $this->inputs, "user" => $user))->render();
        $this->title = "Профиль $user->name";
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $this->checkUser();
        $result = $this->u_rep->updateUser($request, $user);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('/admin')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->checkUser();
        $result = $this->u_rep->deleteUser($user);        
        return back()->with($result);        
    }
}
