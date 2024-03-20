@extends('admin.body')

@section('box-content')
    <div class="container-scroller">
        @include('admin.partials.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('admin.partials.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">

                    {{ html()->form('POST', route('admin.teams.store'))->class('form-horizontal')->id('slideData')->open() }}
                    <div>
                        <h3>Project</h3>
                        <section>
                            <div class="form-group">
                                <label for="project">Select your project</label>
                                {{ html()->select('project', $projects->pluck('name', 'id'))->class('form-control')->id('project_select') }}
                            </div>
                        </section>

                        <h3>Members</h3>
                        <section>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Percentage</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                {{ html()->input('hidden', 'members')->id('members') }}
                            </div>
                        </section>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var form = $("#slideData");
        form.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            // remove finish button
            onFinished: function(event, currentIndex) {
                form.submit();
            }
        });

        function initTable() {
            var users = [];
            var table = form.find('table tbody');
            table.empty();

            $.ajax({
                url: '/api/project/' + $('#project_select').val() + '/experience/',
                method: 'GET',
                success: function(response) {
                    users = response;
                    users.forEach(function(user, i) {
                        if (user.percentage > 0) {
                            var tr = $('<tr>');
                            tr.append('<td>' + i + '</td>');
                            tr.append('<td>' + user.user + '</td>');
                            tr.append('<td>' + user.percentage + '</td>');
                            table.append(tr);

                            // add user to hidden input
                            var members = form.find('#members');
                            members.val(members.val() + user.user + ',');
                        }
                    });
                }
            });
        }

        initTable();

        $(document).on('change', '#project_select', function() {
            initTable();
        });
    </script>
@endsection
