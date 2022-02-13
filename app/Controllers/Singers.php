<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Singer;
class Singers extends Controller{

    public function index()
    {
      $singer = new Singer();
      $datos['singers'] = $singer->orderBy('id','ASC')->findAll();
      $datos['header'] = view('template/header');
      $datos['footer'] = view('template/footer');
      return view('singer/list',$datos);
    }



    public function create(){
      $datos['header'] = view('template/header');
      $datos['footer'] = view('template/footer');
      return view('singer/create',$datos);
    }



    public function save(){
      $singer = new Singer();

      $validated = $this->validate([
        'nombre'=>'required|min_length[3]',
        'fecha_nacimiento'=>'required|min_length[6]',
        'biografia'=>'required|min_length[8]',
        'genero'=>'required|min_length[3]',
        'foto' => [
          'uploaded[foto]',
          'mime_in[foto,image/jpg,image/jpeg,image/png]',
          'max_size[foto,1024]'
         ]
      ]);

      if(!$validated){ 
        $session = session();
        $session->setFlashdata('mensaje','Revise la informacion');
        return redirect()->back()->withInput();
      }
      if($foto=$this->request->getFile('foto')){
        $nuevoNombre = $foto->getRandomName();
        $foto->move('../public/uploads/',$nuevoNombre);

        $datos=[
          'nombre'=>$this->request->getVar('nombre'),
          'fecha_nacimiento'=>$this->request->getVar('fecha_nacimiento'),
          'biografia'=>$this->request->getVar('biografia'),
          'foto'=>$nuevoNombre,
          'genero'=> $this->request->getVar('genero')
        ];
        $singer->insert($datos);
      }
      return $this->response->redirect(site_url(''));
    }




    public function delete($id=null){
      $singer = new Singer();
      $datosSinger=$singer->where('id',$id)->first();
      $ruta=('../public/uploads/'.$datosSinger['foto']);
      if (file_exists($ruta)){
        unlink($ruta);
      }
   
    
      $singer->where('id',$id)->delete($id);
      return $this->response->redirect(site_url(''));
    }
    



    public function edit($id=null){
      $singer = new Singer();
      $datos['singer']=$singer->where('id',$id)->first();
      $datos['header'] = view('template/header');
      $datos['footer'] = view('template/footer');
      return view('singer/edit',$datos);
    }



    public function update(){
       $singer = new Singer();
       
      $validated = $this->validate([
        'nombre'=>'required|min_length[3]',
        'fecha_nacimiento'=>'required|min_length[6]',
        'biografia'=>'required|min_length[8]',
        'genero'=>'required|min_length[3]'
      ]);

      if(!$validated){ 
        $session = session();
        $session->setFlashdata('mensaje','Revise la informacion');
        return redirect()->back()->withInput();
      }


        $datos=[
          'nombre'=>$this->request->getVar('nombre'),
          'fecha_nacimiento'=>$this->request->getVar('fecha_nacimiento'),
          'biografia'=>$this->request->getVar('biografia'),
          'genero'=> $this->request->getVar('genero')
        ];
        $id =$this->request->getVar('id');
        $singer->update($id,$datos); 

       //--------------------------------//
       $validated = $this->validate([
         'nombre'=>'required|min_length[3]',
        'imagen' => [
         'uploaded[imagen]',
         'mime_in[imagen,image/jpg,image/jpeg,image/png]',
         'max_size[imagen,1024]'
        ]
       ]);
       if($validated){ 
      
        if($imagen=$this->request->getFile('imagen')){
         
          $datoSinger=$singer->where('id',$id)->first();
          $ruta=('../public/uploads/'.$datoSinger['foto']);
          var_dump($ruta);
          if(is_file($ruta)){
            unlink($ruta);
          }
          

              $nuevoNombre = $imagen->getRandomName();
              $imagen->move('../public/uploads/',$nuevoNombre);
            
             $datos=['foto'=>$nuevoNombre];
             $singer->update($id,$datos);
        
            }
    }
    return $this->response->redirect(site_url(''));
  }
}
