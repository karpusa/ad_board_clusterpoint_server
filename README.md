Ad board backend API with DB NOSQL Clusterpoint

Client side: https://github.com/karpusa/ad_board_clusterpoint

### Run the Application

Use `composer install`

Rename "app/config/config.php.dist" to "app/config/config.php" and change settings to database

###Server Requirements
- PHP 5.4.0 and above
- JSON needs to be enabled

###DB Clusterpoint settings

Database 'ad'

```
<policy>
    <rule>
        <xpath>//document</xpath>
        <property>index=xml&amp;text&amp;facet</property>
        <property>index-numbers=yes</property>
        <property>index-empty=yes</property>
        <property>exact-match=all</property>
        <property>list=yes</property>
        <property>document=yes</property>
    </rule>
    <rule>
        <xpath>//document/id</xpath>
        <property>index=-facet</property>
        <property>index-numbers=int</property>
        <property>id=yes</property>
    </rule>
    <rule>
        <xpath>//document/title</xpath>
        <property>index=text</property>
        <property>exact-match=all</property>
        <property>coll-lang=en</property>
    </rule>
    <rule>
        <xpath>//document/message</xpath>
        <property>index=text</property>
        <property>exact-match=all</property>
        <property>coll-lang=en</property>
    </rule>
    <rule>
        <xpath>//document/price</xpath>
        <property>index-numbers=yes</property>
    </rule>
    <rule>
        <xpath>//document/category</xpath>
        <property>index-numbers=int</property>
    </rule>
</policy>
```

Database 'category'

```
<policy>
    <rule>
        <xpath>//document</xpath>
        <property>document=yes</property>
        <property>index=xml&amp;text&amp;facet</property>
        <property>index-numbers=yes</property>
        <property>exact-match=binary</property>
        <property>index-empty=yes</property>
        <property>list=yes</property>
    </rule>
    <rule>
        <xpath>//document/id</xpath>
        <property>index=-facet</property>
        <property>exact-match=none</property>
        <property>id=yes</property>
    </rule>
    <rule>
        <xpath>//document/name</xpath>
        <property>index=text</property>
        <property>coll-lang=en</property>
    </rule>
</policy>
```