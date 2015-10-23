<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Calculations']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //file_put_contents('C:\Extras\Repo\projects\cakephp\adduser.txt',print_r($this->request,true));
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->registration_date = new \DateTime();
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $user = array('staus'=>'failure','error_message'=>'unable to save user');
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * login method
     *
     * @return user
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function login()
    {
        $this->request->allowMethod(['post']);
        $user_name = $this->request->data['user_name'];
        $password = $this->request->data['password'];
        $user = $this->Users
                            ->find()
                            ->where(['user_name'=>$user_name,'password'=>$password])
                            ->first();
        if($user != null) {
            $user->last_login_date = new \DateTime();
            $user->active_session = true;
            $this->Users->save($user);
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * logout method
     *
     * @return user
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function logout()
    {
        $this->request->allowMethod(['post']);
        $user_name = $this->request->data['user_name'];
        $user = $this->Users
            ->find()
            ->where(['user_name'=>$user_name])
            ->first();
        if($user != null) {
            $user->active_session = false;
            $this->Users->save($user);
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
}
