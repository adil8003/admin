<h2>Project</h2>
            <form id="Viewproject">
                <div class="form-group row control-group">
                    <label for="Username" class="col-sm-2 form-control-label">Year of Construct</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="yearofconst" name="yearofconst" value="" placeholder="Year of Construct" >
                        <p id="err-yearofconst" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Possion" class="col-sm-2 form-control-label">Year of expt possion</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="yearofpossion" name="yearofpossion" value="" placeholder="Year of expt possion" >
                        <p id="err-yearofpossion" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group ">
                    <label for="Ownership" class="col-sm-2 form-control-label">Ownership type</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="ownershiptype" name="ownershiptype" placeholder="- Select Ownership type -">
                            <option>Free hold</option>
                            <option>leasejold</option>
                            <option>Power of attorney</option>
                            <option>Cooperative society</option>
                        </select>
                        <p id="err-ownershiptype" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">No Of Tower</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="noftower" name="towers" value="" placeholder="Towers">
                        <p id="err-towers" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">No of Floor</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="towers" name="towers" value="" placeholder="Towers">
                        <p id="err-towers" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Towers" class="col-sm-2 form-control-label">No of Flat Per Floor</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="towers" name="towers" value="" placeholder="Towers">
                        <p id="err-towers" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Row House" class="col-sm-2 form-control-label">No Of Row House</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="rowhouse" name="rowhouse" value="" placeholder="Type of Row House" >
                        <p id="err-rowhouse" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="villa" class="col-sm-2 form-control-label">Villa</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="typeofvilla" name="typeofvilla" value="" placeholder="Type Of Villa" >
                        <p id="err-typeofvilla" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="villa" class="col-sm-2 form-control-label">Commercial Shop</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control input-sm" id="typeofvilla" name="typeofvilla" value="" placeholder="Type Of Villa" >
                        <p id="err-typeofvilla" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row control-group">
                    <label for="Comments" class="col-sm-2 form-control-label">Comments</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" rows="1" id="comments" name="comments" value="" placeholder="Comments" ></textarea>
                        <p id="err-villa" class="text-danger"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="saveProperty();" type="button" class="btn btn-success">Save</button>
                        <button onclick="resetProfile();" type="button" class="btn btn-success">Cancel</button>
                    </div>
                </div>
            </form>