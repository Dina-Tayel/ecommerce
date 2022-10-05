<?php 


namespace App\Services ;

use App\Repositories\userRepository;
use App\Traits\MediaTrait;
use Illuminate\Support\Facades\Hash;

class UserService 
{
    use MediaTrait ;

    protected $userRepository ;

    public function __construct(userRepository $userRepository)
    {
        $this->userRepository =$userRepository ;
    }

    public function store($data)
    {

        if(isset($data['img']))
        {
            $data['img']= $this->uploadFile($data['img'] , 'uploads/users/');
        }
        $data['password']=Hash::make($data['password']);
        return $this->userRepository->save($data);
    }

    public function getUser($id)
    {
        return $this->userRepository->getById($id);
    }


    public function update($data, $id)
    {
        $user=$this->getUser($id);
        if(!empty($data['img'])) {
            $this->deleteFile(public_path('uploads/users/'.$user->img));
        }
        $data['img'] = !(empty($data['img'])) ? $this->uploadFile($data['img'],'uploads/users/') : $user->img ;
        $data['password'] = (!empty($data['password'])) ? Hash::make( $data['password'] ) : $user->password ;
        return $this->userRepository->update($user , $data);
    }
    public function destroy($id)
    {
        $user = $this->getUser($id);
        $this->deleteFile(public_path('uploads/users/' . $user->img));
        return $this->userRepository->delete($user);
    }

    public function toggle($id)
    {
        return $this->userRepository->toggle($id);
    }

}