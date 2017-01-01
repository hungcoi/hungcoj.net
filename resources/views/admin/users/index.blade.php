@extends('layouts.dashboard')

@section('content')
    <div id="user-management" class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                    <div class="margin-top-20">
                        @include('partial.success')
                        @include('partial.error')
                    </div>
                <div class="x_content">
                    <table class="footable table table-stripped" data-page-size="{{ config('common.paginate') }}" data-filter=#filter>
                        <col width="10%">
                        <col width="35%">
                        <col width="35%">
                        <col width="10%">
                        <col width="10%">
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('user.attributes.id') }}
                                </th>
                                <th>
                                    {{ trans('user.attributes.name') }}
                                </th>
                                <th>
                                    {{ trans('user.attributes.email') }}
                                </th>
                                <th class="text-center">
                                    {{ trans('user.attributes.role') }}
                                </th>
                                <th class="no-link last action text-center footable-sortable">
                                    {{ trans('user.attributes.action') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                            <tr class="user-id-{{ $user->id }}">
                                <td class="text-center">{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">{{ $user->role }}</td>
                                @if (auth()->user()->id !== $user->id)
                                    <td class="text-center">
                                        {!! Form::select('level', trans('user.level'),
                                            $user->level, [
                                                'id' => 'user-level-' . $user->id,
                                                'class' => 'form-control change-level',
                                                'data-user-id' => $user->id, 'data-level' => $user->level,
                                                'data-user-name' => $user->name
                                            ]
                                        ) !!}
                                    </td>
                                    <td class="text-center last action">
                                        {!! Form::submit(
                                            trans('common.button.delete'), [
                                                'class' => 'btn btn-danger user-delete',
                                                'data-user-id' => $user->id, 'data-level' => $user->level,
                                                'data-user-name' => $user->name
                                            ]
                                        ) !!}
                                    </td>
                                @else
                                    <td class=""></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-center">
                                    <ul class="pagination"></ul>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    {{ csrf_field() }}
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.translations = {
            comfirmDelete: "{!! trans('message.user.delete_warning') !!}",
            deleteError: "{!! trans('message.user.delete_error') !!}",
            changeStatusError: "{!! trans('message.user.change_status_error') !!}",
            changeLevelError: "{!! trans('message.user.change_level_error') !!}",
            comfirmChangeLevel: "{!! trans('message.user.change_level_warning') !!}",
        };
    </script>
@endsection

