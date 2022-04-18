<?php $__env->startSection('content'); ?>
 <div class="container" style="padding:30px;">
    <h3>Düğüm Ekle</h3>
    <div class="">
      <input type="text" id="nodeId" class="node-inputs" placeholder="Düğüm Adı...">
    </div>
    <div class="add-node-inputs-con">
      <input type="text" id="nodeSource" class="node-inputs" placeholder="Düğüm Kaynagı...">
    </div>
    <div class="add-node-inputs-con">
      <input type="text" id="nodeCategory" class="node-inputs" placeholder="Düğüm Kategori...">
    </div>
    <div class="add-node-inputs-con">
      <input type="text" id="nodeAddress" class="node-inputs" placeholder="Düğüm Adres...">
    </div>
    <div class="add-node-inputs-con">
      <input type="text" id="nodeLocation" class="node-inputs" placeholder="Düğüm Harita...">
    </div>
    <div class="add-node-inputs-con">
      <input type="text" id="nodeLink" class="node-inputs" placeholder="Düğüm Link...">
    </div>
    <div class="add-node-inputs-con">
      <textarea name="" id="nodeText" class="node-inputs" cols="30" rows="3" placeholder="Düğüm Açıklama"></textarea>
    </div>
    <input type="button" value="Düğüm Ekle" id="addNode" class="nodes-btn" onclick="addNode()">

    <hr>
    <h3>Bağlantı Ekleme</h3>
    <div class="add-node-inputs-con">
      <input type="text" id="edgeId" class="node-inputs" placeholder="Bağlantı Adı...">
    </div>
    <div class="add-node-inputs-con">
      <input type="text" id="edgeSource" class="node-inputs" placeholder="Bağlantı Kaynağı...">
    </div>
    <div class="add-node-inputs-con">
      <input type="text" id="edgeTarget" class="node-inputs" placeholder="Bağlantı Hedef...">
    </div>
    <input type="button" value="Bağlantı Ekle"  class="nodes-btn" onclick="connectEdge()">
    <hr>
    <h3>Düğüm Silme</S></h3>
    <div class="add-node-inputs-con">
      <input type="text" name="removeId" id="removeId" class="node-inputs" placeholder="Düğüm Adı..." required>
      <label for="aggre">
          <span class="aggre-text">Alt Bağlantılar Dahil</span>
      </label>
      <input type="checkbox" name="aggre" id="includeChild" class="aggre-btn">
    </div>
    <input type="button" value="Düğüm Sil"  class="nodes-btn" onclick="removeNode()">
  </div>
  <script>
    //add parent
      const addNode = async () => {
        let id = document.getElementById('nodeId').value
        let source = document.getElementById('nodeSource').value
        let category = document.getElementById('nodeCategory').value
        let location = document.getElementById('nodeLocation').value
        let address = document.getElementById('nodeAddress').value
        let link = document.getElementById('nodeLink').value
        let text = document.getElementById('nodeText').value
        if(id === ''
          || source === ''
          || category === ''
          || location === ''
          || address === ''
          || link === ''
          || text === '') {
          alert('Lütfen alanları doldurunuz!')
        } else {
          const result = await fetch('/addnode', {
            method:'Post',
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>',
            },
            body:JSON.stringify({
              id:id,
              source:source,
              category:category,
              location:location,
              address:address,
              link:link,
              text:text
            })
          })
          const final = await result.json()
          alert(final.msg)
        }
      }
    //connect edge
      const connectEdge = async () => {
        let edgeID = document.getElementById('edgeId').value
        let edgeSource = document.getElementById('edgeSource').value
        let edgeTarget = document.getElementById('edgeTarget').value
        if(edgeID == '' || edgeSource === '' || edgeTarget === ''){
          alert('Lütfen alanları doldurunuz!')
        } else {
          const result = await fetch('/connectedge', {
            method:'Post',
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>',
            },
            body:JSON.stringify({
              edgeId:edgeID,
              edgeSource:edgeSource,
              edgeTarget:edgeTarget
            })
          })
          const final = await result.json()
          edgeId = ''
          edgeSource = ''
          edgeTarget = ''
          alert(final.msg)
        }
      }
    //remove node and edges
      const removeNode = async () => {
        let removeId = document.getElementById('removeId').value
        let checkAll = document.getElementById('includeChild').checked
        if(removeId){
        const result = await fetch('/admin/removenode',{
          method:'POST',
          headers: {
              Accept: 'application/json',
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>'
          },
          body:JSON.stringify({
            id:removeId,
            includeChild: checkAll
          })
        })
          const final = await result.json()
          if(final.msg === '401'){
            alert('Böyle bir düğüm yoktur!')
          } else {
            removeId = ''
            alert(final.msg)
          }
        } else {
          alert('Lütfen bir düğüm seçiniz!')
        }
      }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mfaga\Downloads\creativehubs\creativehubs\resources\views/addnode.blade.php ENDPATH**/ ?>