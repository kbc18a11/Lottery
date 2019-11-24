<h1 style="margin-bottom: 10px">当選を行う</h1>
<div class="winningform">
    <h3>当選種類別にランダムに当選させる</h3>
    <form action="" method="post">
        <input type="hidden" name="competition_id">
        <div class="form-group">
            <label for="">当選種類</label>
            <select class="form-control" name="winning_types_id" id="">
                @foreach ($winningtypes as $item)
                <option value="{{$item->id}}">種類名：{{$item->name}}&nbsp;&nbsp;&nbsp;最大人数：{{$item->maxNumberOfPeople}}
                </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">当選させる</button>
        </div>
    </form>
</div>
<div class="winningform">
    <h3>個別に当選させる</h3>
    <form action="" method="post">
        <div class="form-group">
            <label for="">当選番号</label>
            <textarea class="form-control" name="winningNo" id="" rows="1"></textarea>
        </div>
        <div class="form-group">
            <label for="">当選種類</label>
            <select multiple class="form-control" name="winningtype" id="">
                <option></option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">当選させる</button>
    </form>
</div>
<div class="winningform">
    <h3>当選種類別に範囲を決めて当選させる</h3>
    <form action="" method="post">
        <input type="hidden" name="competition_id">
        <div class="form-group">
            <label for="">当選種類</label>
            <select class="form-control" name="winning_types_id" id="">
                @foreach ($winningtypes as $item)
                <option value="{{$item->id}}">{{$item->name}}&nbsp;&nbsp;&nbsp;最大人数：{{$item->maxNumberOfPeople}}
                </option>
                @endforeach
            </select>
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="">最小番号</label>
                    <input type="text" name="minno" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">対象の範囲の最小値をご入力してください</small>
                </div>
                <div class="form-group col-6">
                    <label for="">最大番号</label>
                    <input type="text" name="maxno" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">対象の範囲の最大値をご入力してください</small>
                </div>
                <p>※片方だけでも決めることができます</p>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">当選させる</button>
    </form>
</div>

<table class="table winning_nosTable">
    <thead>
        <tr>
            <th>当選種類名</th>
            <th>当選番号</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row"></td>
            <td></td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td></td>
        </tr>
    </tbody>
</table>
