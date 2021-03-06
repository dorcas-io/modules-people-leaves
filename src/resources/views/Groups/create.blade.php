@extends('layouts.tabler')
@section('body_content_header_extras')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('body_content_main')

    @include('layouts.blocks.tabler.alert')

    <div class="row">

        @include('layouts.blocks.tabler.sub-menu')
        <div class="col-md-9 col-xl-9">
            <div class="row row-cards row-deck " >
                <div class="col-sm-12" id="approvals">
                        <div class="col-md-12" >
                            <div class="col-md-12 align-items-end" >
                                <a class="float-le btn btn-primary btn-pill" href="{{route('leave-groups-main')}}">
                                    <span><i class="fe fe-arrow-left"></i></span>
                                   Back to Groups
                                </a>
                            </div>
                            <br/>
                            <form action="/mpe/leave-groups"  method="post">
                                {{csrf_field()}}
                                <fieldset>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <div class="form-group">
                                                <div class="form-group col-md-12">
                                                    <label class="form-label" for="transaction">Select leave types for this group </label>
                                                    <select  id="select-tags-advanced"  class="form-control mr-5" multiple required>
                                                        @foreach($leaveTypes as $type)
                                                            <option value="{{$type->id}}"> {{$type->title }}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" id="types" name="types">
                                                </div>

                                            </div>

                                          <div class="form-group">
                                              <label class="form-label" >Group  Type</label>

                                              <select   class="form-control  " id="group_type"  name="group_type" required >
                                                  <option value="" disabled selected >Select Group Type</option>
                                                  <option value="team">Team </option>
{{--                                                  <option value="department"> Department </option>--}}
                                              </select>
                                          </div>
                                            <div class="form-group">
                                                    <label class="form-label" for="transaction">Select Employee Team </label>
                                                    <select   class="form-control  "  name="group_id"  >
                                                        <option disabled selected="">Select an Employee Team</option>
                                                        @foreach($teams as $team)
                                                            <option value="{{$team->id}}"> {{$team->name }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
{{--                                            <p> You will Select Based on the Group Type Above...</p>--}}
{{--                                              <div class="form-group col-md-12" id="department" >--}}
{{--                                                  <label class="form-label" for="transaction">Select Employee Department </label>--}}
{{--                                                  <select   class="form-control  " id="select4"  name="group_id"  >--}}
{{--                                                      <option disabled selected="">Select an Employee Department</option>--}}
{{--                                                      @foreach($departments as $department)--}}
{{--                                                          <option value="{{$department->id}}"> {{$department->name }}</option>--}}
{{--                                                      @endforeach--}}
{{--                                                  </select>--}}
{{--                                              </div>--}}

                                            <div class="form-group">
                                                <label class="form-label" >Duration</label>
                                                <input class="form-control"  placeholder="Enter Leave Group Type " type="text" name="duration_days" required>
                                            </div>

                                        </div>

                                    </div>
                                    <button type="submit"   class="btn btn-primary">Submit</button>

                                </fieldset>
                            </form>
                        </div>

                </div>



            </div>

        </div>
    </div>

@endsection
@section('body_js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            function Match (params, data) {
                // If there are no search terms, return all of the data
                if ($.trim(params.term) === '') { return data; }

                // Do not display the item if there is no 'text' property
                if (typeof data.text === 'undefined') { return null; }

                // `params.term` is the user's search term
                // `data.id` should be checked against
                // `data.text` should be checked against
                var q = params.term.toLowerCase();
                if (data.text.toLowerCase().indexOf(q) > -1 || data.id.toLowerCase().indexOf(q) > -1) {
                    return $.extend({}, data, true);
                }

                // Return `null` if the term should not be displayed
                return null;
            };


            $("#select3").select2({
                matcher: Match
            });
            $("#select4").select2({
                matcher: Match
            });

            $('#select-tags-advanced').selectize({
                plugins: ['remove_button'],
                onChange: function(value) {
                    $('#types').val(value)
                }
            });
        })



        //
        // $('#group_type').on('change',function(){
        //     var selection = $(this).val();
        //     $('#toggle').css('display','block')
        //     console.log($(this).val())
        //     $("#team").toggle($(this).val()=="team");
        //     $("#department").toggle($(this).val()=="department");
        // });


    </script>
@endsection

