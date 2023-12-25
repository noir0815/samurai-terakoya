@extends('layouts.app')

@section('content')

<main class="py-4">
              <div class="container">
                  <div class="row justify-content-center">
                      <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-10">                
                          <h1 class="mb-3">会社情報</h1> 
          
                          <div class="mb-3">
                              <a href="{{ url('/') }}">< 戻る</a>     
                          </div>                     
                          
                          <table class="table table-bordered">
                              <tr>
                                  <th>会社名</th>
                                  <td>{{$company["company_name"]}}</td>
                              </tr>
                              <tr>
                                  <th>代表者</th>
                                  <td>{{$company["president"]}}</td>
                              </tr>
                              <tr>
                                  <th>設立日</th>
                                  <td>{{$company["establishment_date"]}}</td>
                              </tr>
                              <tr>
                                  <th>郵便番号</th>
                                  <td>〒{{$company["postal_code"]}}</td>
                              </tr>
                              <tr>
                                  <th>住所</th>
                                  <td>{{$company["address"]}}</td>
                              </tr>
                              <tr>
                                  <th>事業内容</th>
                                  <td>{{$company["description"]}}</td>
                              </tr>                                                                                                
                          </table>                                                                        
                      </div>                          
                  </div>
              </div>                                   
                  </main>
          
                      </div>
          
              </body>
@endsection
