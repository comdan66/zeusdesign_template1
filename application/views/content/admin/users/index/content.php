<header>
  <div class='title'>
    <h1>會員</h1>
    <p>會員權限管理</p>
  </div>

  <form class='select'>
    <button type='submit' class='icon-s'></button>

<?php 
    if ($columns) { ?>
<?php foreach ($columns as $column) {
        if (isset ($column['select']) && $column['select']) { ?>
          <select name='<?php echo $column['key'];?>'>
            <option value=''>請選擇 <?php echo $column['title'];?>..</option>
      <?php foreach ($column['select'] as $option) { ?>
              <option value='<?php echo $option['value'];?>'<?php echo $option['value'] === $column['value'] ? ' selected' : '';?>><?php echo $option['text'];?></option>
      <?php } ?>
          </select>
  <?php } else { ?>
          <label>
            <input type='text' name='<?php echo $column['key'];?>' value='<?php echo $column['value'];?>' placeholder='<?php echo $column['title'];?>搜尋..' />
            <i class='icon-s'></i>
          </label>
<?php   }
      }?>
<?php 
    } ?>

  </form>
</header>


<div class='panel'>
  <header>
    <h2>會員 列表</h2>
  </header>

  <div class='content'>


    <table class='table'>
      <thead>
        <tr>
          <th width='50' class='center'>#</th>
          <th width='70' class='center'>照片</th>
          <th width='150'>名稱</th>
          <th width='250'>郵件</th>
          <th>權限</th>
          <th width='150' class='right'>登入時間</th>
          <th width='50' class='right'>設定</th>
        </tr>
      </thead>
      <tbody>
  <?php if ($objs) {
          foreach ($objs as $obj) { ?>
            <tr>
              <td class='center'><?php echo $obj->id;?></td>
              
              <td class='center'>
                <figure class='_i' href='<?php echo $obj->avatar (200, 200);?>'>
                  <img src='<?php echo $obj->avatar (200, 200);?>' />
                  <figcaption data-description='<?php echo $obj->name;?>'><?php echo $obj->name;?></figcaption>
                </figure>
              </td>
              <td><?php echo $obj->name;?></td>
              <td><?php echo $obj->email;?></td>
              <td><?php echo implode (', ', $obj->role_names ());?></td>
              <td class='right'><time datetime='<?php echo $obj->logined_at->format ('Y-m-d H:i:s');?>'><?php echo $obj->logined_at->format ('Y-m-d H:i:s');?></time></td>

              <td class='right'>
                <a class='icon-se' href="<?php echo base_url ($uri_1, $obj->id, 'show');?>"></a>
              </td>
            </tr>
    <?php }
        } else { ?>
          <tr>
            <td colspan='8' class='no_data'>沒有任何資料。</td>
          </tr>
  <?php } ?>
      </tbody>
    </table>

    <div class='pagination'>
      <?php echo $pagination;?>
    </div>

  </div>
</div>

