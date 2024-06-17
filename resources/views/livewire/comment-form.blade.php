<div>
    <form wire:submit.prevent="submit">
        @csrf

        <div class="form-group">
            <label for="body">Comment:</label>
            <textarea wire:model="body" id="body" class="form-control" rows="3"></textarea>
            @error('body') <span class="text-red-500 error">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
