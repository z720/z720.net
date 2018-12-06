Attribute VB_Name = "RemoveAllowBreakAccrossPages"
Sub RemoveAllowBreakAccrossPages()
'
' Macro will loop through current document and will remove the 
' "Allow Break Accross Pages" from all the tables
'
'
Dim table As table

For Each table In ActiveDocument.Tables
    table.Rows.AllowBreakAcrossPages = False
Next table

End Sub
