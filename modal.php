<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h7 style="font-size: 25px; font-weight:bold; vertical-align: text-bottom;">Update Campaigns</h7>
        <button type="button" class="close" data-bs-toggle="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="UpdateCamp.php" method="POST" id="updateCamp">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Name</span>
              <input type="text" placeholder="Enter Your Name" id="ename" name="campName">
              <p id="err_campName" style="color: lightcoral;display:none"></p>
            </div>
            <div class="input-box">
              <span class="details">Contact No</span>
              <input type="text" placeholder="+94" id="econtact" name="contactNo">
              <p id="err_contactNo" style="color: lightcoral;display:none"></p>
            </div>
            <div class="input-box">
              <span class="details">Date</span>
              <input type="date" id="eDate" name="Date">
              <p id="err_date" style="color: lightcoral;display:none"></p>
            </div>


            <div class="input-box">
              <span class="details">NIC</span>
              <input type="text" placeholder="Enter NIC" id="eNIC" name="NIC">
              <p id="err_NIC" style="color: lightcoral;display:none"></p>
            </div>
            <div class="input-box">
              <span class="details">Address</span>
              <textarea id="eaddress" name="address" rows="4" cols="30"></textarea>
              <p id="err_address" style="color: lightcoral;display:none"></p>

              </textarea>
            </div>

          </div>
          <div class="button " id="Update">
                <input type="button" name="update" value="Update">
                </form>
              </div>
          <div class="row">
            <div class="column">

              
            </div>

          </div>
        </form>
        <script src="validation.js"></script>
        <script>
          document.getElementById("Update").addEventListener('click', () => {
            let isNicValid = ValidateNic("eNIC", "err_NIC");
            let isNameValid = ValidateText("ename", "err_campName");
            let isAddressValid = ValidateText("eaddress", "err_address");
            let isDateValid = ValidateDate("eDate", "err_date");
            let isContactValid = ValidatePhoneNo("econtact", "err_contactNo", "This ")



            if (isNicValid && isNameValid && isAddressValid && isDateValid && isContactValid) {

              document.getElementById("updateCamp").submit();

            }

          });
        </script>
      </div>
      <div class="modal-footer">
        
        
      </div>
    </div>

  </div>
</div>
<button  id = "updateModal" type="button" hidden="true" data-bs-toggle="modal" data-bs-target="#edit">

</button>