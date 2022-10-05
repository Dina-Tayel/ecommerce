<?php 


namespace App\Repositories ;

use App\Models\User;
use Illuminate\Support\Str;

class userRepository
{

    private $user ;
    public function __construct(User $user)
    {
        $this->user = $user ;
        
    }

    public function save($data)
    {

        return $this->user->create( $data);
    }

    
    public function getById($id)
    {
        return $this->user->findOrFail($id);

    }

    public function update($user, $data)
    {
        return $user->update($data);
       
    }

    public function delete($user)
    {
        return  $user->delete();
    }

    public function toggle($id)
    {
        $user = $this->getById($id);
        $status = $user->status == 'active' ? 'inactive' : 'active';
        return $user->update([
            'status' => $status,
        ]);
    }

}