<?php
class User extends Model {
    protected $table = 'users';
    
    public function findByEmail($email) {
        return $this->findBy('email', $email);
    }
    
    public function createUser($data) {
        $data['password'] = Auth::hashPassword($data['password']);
        return $this->create($data);
    }
    
    public function updatePassword($id, $password) {
        $this->update($id, ['password' => Auth::hashPassword($password)]);
    }
}
