@extends('voyager::master')

@section('page_title', 'البطاقة')

@section('css')
<style>
  .flex_center{
    display: flex;
    justify-content: center;
  }
  .card_bg{
    background: #fff;
    border: 1px solid #b2b2b2ee;
    background-position: center!important;
    background-size: contain!important;
    background-repeat: no-repeat!important;
  }
</style>
@stop


@section('content')
<div id="app">
  <div v-if="IsErrror">
    <div class="alert alert-danger">
      <div v-for="(v, k) in errors" :key="k">
        <p v-for="error in v" :key="error" class="text-sm">
          <span v-text="error"></span>
        </p>
      </div>
    </div>
  </div>
  <h1 class="page-title mb-4">
    <i class="icon voyager-pen"></i> انشاء البطاقة
  </h1>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">اضافة خانة جديدة</button>
  <div class="collapse" id="collapseExample">
  <div class="card card-body">
    <div class="container">
      <div class="row pt-4">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">عنوان الخانة</label>
            <input type="text" class="form-control" placeholder="عنوان الخانة" id="title" v-model="title"/>
          </div>
          <div class="form-group">
            <label for="">اسم الخانة</label>
            <input type="text" class="form-control"  placeholder="اسم الخانة" id="name" name="name" v-model="name">
          </div>
          <div class="form-group">
            <label for="">نوع النص </label>
            <select name="type_text" class="form-control" id="type_text" v-model="type_text">
              <option value="center">على الوسط</option>
              <option value="left">على اليسار</option>
              <option value="right">على اليمين</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Margin Top</label>
            <input type="number" class="form-control" name="margin_top" id="margin_top" placeholder="Margin top" value="0" v-model="margin_top" max="{{ $card->height}}">
          </div>
          <div class="form-group">
            <label for="">Margin right</label>
            <input type="number" class="form-control" name="margin_right" id="margin_right" placeholder="Margin right" value="0" v-model="margin_right">
          </div>
          <div class="form-group">
            <label for="">لون النص</label>
            <input type="color" name="color" v-model="color" id="color" placeholder="لون النص" value="#000">
          </div>
          <div class="form-group">
            <button class="btn btn-primary" type="submit" v-if="!disable_btn" v-on:click="getPosts()">اضافة</button>
            <button class="btn btn-primary" type="submit" v-else disabled>اضافة</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="page-content settings container-fluid flex_center mt-4">
    <div class="card_bg" style="width:{{$card->width }}px; height:{{$card->height }}px; background:url('{{ Voyager::image($card->image) }}') ">
      @foreach($input_cards as $input_card)
        <div style="margin-top:{{ $input_card->margin_top }}px;margin-right:{{ $input_card->margin_right }}px;text-align:{{ $input_card->type_text }};color:{{ $input_card->color }}">{{ $input_card->title }}</div>
      @endforeach
      <div v-text="title" v-bind:style="'margin-top:'+margin_top+'px;margin-right:'+margin_right+'px;text-align:'+type_text+';color:'+color"></div>

    </div>
  </div>
</div>

@stop

@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" ></script>
<script>
    var app2 = new Vue({
    el: '#app',
    data: {
      title: 'نص تجريبي هنا ',
      name: '',
      type_text:'center',
      margin_top: 0,
      margin_right: 0,
      color: '#000',
      disable_btn: false,
      errors:[],
      IsErrror:false,
      card_id: <?php echo $card->id; ?>
    },
    methods:{
        getPosts() {
          this.disable_btn = true;
          axios.post('/api/add-input',
            { 
              title: this.title,
              name: this.name,
              type_text: this.type_text,
              margin_top: this.margin_top,
              margin_right: this.margin_right,
              color: this.color,
              card_id:  this.card_id
            },
            { headers: {
            'Content-type': 'application/json',
            }
          }).then((response) => {
            this.IsErrror = false
            window.location = '/admin/card/input/'+this.card_id;

            alert('تمت اضافته بنجاح')
          }).catch( error  => { 
            this.IsErrror = true
            this.disable_btn = false;
            this.errors  = error.response.data.errors
          });
        }
    },
    created()
    {
      console.log('here the result')
    }
  })
</script>
@stop
