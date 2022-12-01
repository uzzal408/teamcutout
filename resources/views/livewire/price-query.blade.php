<div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                            <form wire:submit.prevent="saveQuery()" method="POST">
                                @csrf
                                <div class="card border-primary rounded-0">
                                    <div class="card-header p-0">
                                        <div class="bg-info text-white text-center py-2" style="min-height: 80px">
                                            <p class="m-0">Please fill out the form bellow and we will get back to you as soon as possible</p>
                                        </div>
                                    </div>
                                    <div class="card-body p-3 tile">

{{--                                        @if($errors->any())--}}
{{--                                            {{ implode('', $errors->all('<div>:message</div>')) }}--}}
{{--                                        @endif--}}

                                        <!--Body-->
                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                                </div>
                                                <input type="text" wire:model.lazy="name" class="form-control" id="name"  placeholder="*Name">
                                            </div>
                                            @error('name') <span class="error" style="color: red">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                                </div>
                                                <input type="email" wire:model.lazy="email" class="form-control" id="email" placeholder="*Email">
                                            </div>
                                            @error('email') <span class="error" style="color: red">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                                </div>
                                                <textarea class="form-control" wire:model.lazy="message" placeholder="*Message"></textarea>
                                            </div>
                                            @error('message') <span class="error" style="color: red">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="text-center">
                                            <input type="submit" value="Submit" class="btn btn-info btn-block rounded-0 py-2">
                                        </div>
                                    </div>

                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
</div>
