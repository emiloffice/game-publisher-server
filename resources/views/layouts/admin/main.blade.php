<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Page Header
            <small>Optional description</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>USER ID</th>
                    <th>USER NAME</th>
                    <th>COMPANY</th>
                    <th>GAME TITLE</th>
                    <th>GAME BIO</th>
                    <th>GAME REMARK</th>
                    <th>GAME DESCRIPTION</th>
                </tr>
                </thead>
                <tbody>
                @foreach($games as $game)
                    <tr>
                        <td>{{ $game->id }}</td>
                        <td>{{ $game->user_id }}</td>
                        <td>{{ $game->user_name }}</td>
                        <td>{{ $game->company }}</td>
                        <td>{{ $game->game_title }}</td>
                        <td>{{ $game->game_bio }}</td>
                        <td>{{ $game->remark or ' no words'}}</td>
                        <td>{{ $game->description or 'no words'}} </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
        <!-- /.box-body -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->