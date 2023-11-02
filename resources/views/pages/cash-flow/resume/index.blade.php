@extends('layouts/master')
@section('title', 'Resume')
@section('content')
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data</h5>
                </div>
                <div class="col-auto">
                    @if($showButton)
                    {{-- <button type="button">Laporan</button> --}}
                    <a href="{{ route('resume.laporan') }}" class="btn btn-info">Laporan </a>
                    @endif

                    {{--
                    @if (!$inputHariIni)
                    <a href="{{ route('resume.create') }}" class="btn btn-primary ms-2">Create</a>
                    @endif --}}

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                        Create
                    </button>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered dataex-fixh-responsive">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th width="150px" style="text-align: center">Tanggal <br> Resume</th>
                            <th class="text-center"> Total Cash & <br> Bank (Rp.)</th>
                            <th class="text-center">Total Revenue & <br> Sales (Rp.)</th>
                            <th class="text-center">Total OVERBOOKING / <br> PINDAH BUKU (Rp.)</th>
                            <th class="text-center">Total Arus <br> Kas (Rp.)</th>
                            <th width='150px' class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $data)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($data->tgl_resume)->translatedFormat('l, j
                                F
                                Y') }}</td>
                            <td style="text-align: right">{{ number_format($data->cb_total, 2, ',', '.')?? 0
                                }}</td>
                            <td style="text-align: right">{{ number_format($data->rs_total, 2, ',', '.')?? 0
                                }}</td>
                            <td style="text-align: right">{{ number_format($data->pb_total, 2, ',', '.')?? 0
                                }}</td>
                            <td style="text-align: right">{{ number_format($data->ak_total, 2, ',', '.')?? 0
                                }}</td>
                            <td class="text-center">
                                <form method="POST" action="{{ route('resume.destroy', $data->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <a href="{{ route('resume.show', $data->id) }}"
                                        class="btn btn-icon btn-secondary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-original-title="Show">
                                        <span class="ti ti-eye"></span>
                                    </a>
                                    <a href="{{ route('resume.pdf', $data->id) }}" target="_blank"
                                        class="btn btn-icon btn-primary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-original-title="Cetak PDF">
                                        <span class="ti ti-printer"></span>
                                    </a>
                                    <button type="submit" class="btn btn-icon btn-danger btn-sm show_confirm"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete"
                                        aria-describedby="tooltip358783">
                                        <span class="ti ti-trash"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Resume</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('resume.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">Tanggal</label>
                            <input type="date" id="dobWithTitle" class="form-control" name="tgl_resume" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

</script>
@endsection
