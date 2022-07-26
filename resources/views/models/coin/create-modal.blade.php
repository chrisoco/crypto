<!-- Button trigger modal -->
<button type="button" class="glow-on-hover btn btn-success btn-lg mx-auto d-block" data-bs-toggle="modal" data-bs-target="#addCoinModal">
    Add new Coin to Watchlist/Portfolio
</button>

<!-- Modal -->
<div class="modal fade modal-lg mt-5" id="addCoinModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="addCoinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCoinModalLabel">Add new Coin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="#">
                    @csrf
                    @method('POST')




                    <input class="btn btn-block btn-primary mt-3" type="submit" value="Add Coin" />
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-outline-success">Add Coin to Portfolio</button>
                <button type="button" class="btn btn-outline-secondary">Clear Data?</button><!-- data-bs-dismiss="modal" -->
            </div>
        </div>
    </div>
</div>
